#!/usr/bin/env python
# -*- coding: utf-8 -*-

from psycopg2 import connect
from configparser import ConfigParser
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from email.mime.application import MIMEApplication
import smtplib, sys, os, pandas as pd, xml.etree.ElementTree as et


PATH_INI = os.path.join(os.path.abspath(os.path.join(os.path.abspath(os.path.join(os.getcwd(), os.pardir)), os.pardir)), 'config.ini')


def config(filename, section):

    parser = ConfigParser()
    parser.read(filename)

    d = {}

    if parser.has_section(section):
        params = parser.items(section)
        for param in params:
            d[param[0]] = param[1]
    else:
        raise Exception(f'Secção {section} não encontrada no arquivo {filename} ')

    return d


def get_email(_id):

    DB_INFO = config(PATH_INI, 'DB')
    conn = connect(**DB_INFO)
    cur = conn.cursor()
    cur.execute(f'SELECT email FROM usuarios WHERE id = {_id}')
    x = cur.fetchone()

    return x[0]


def send_email(toaddr, subject, body, filename=None, msg_return='Email enviado com sucesso'):

    msg = MIMEMultipart()
    e = config(PATH_INI, 'EMAIL')

    msg['from'] = e['login']
    msg['to'] = toaddr
    msg['subject'] = subject

    html = '''\
        <html>
          <body>
            <p>
            %s
            </p>
          </body>
        </html>
        ''' % body

    msg.attach(MIMEText(html.encode('utf-8'), 'html', 'utf-8'))

    if filename is not None:
        attachment = open(filename, "rb")
        part = MIMEApplication(attachment.read())
        part.add_header('Content-Disposition', 'attachment', filename="%s" % os.path.basename(filename))
        msg.attach(part)

    try:
        server = smtplib.SMTP(e['smtp'], int(e['port']))
        server.starttls()
        server.login(e['login'], e['pwd'])
        text = msg.as_string()
        server.sendmail(msg['From'], msg['To'], text)
        server.quit()
        if filename is not None:
            print(msg_return + ': ' + filename + '!')
        else:
            print(msg_return)
    except smtplib.SMTPException as error:
        print(f"Erro no envio do email :  {error}")


def to_xml(name, table):
    DB_INFO = config(PATH_INI, 'DB')
    conn = connect(**DB_INFO)
    base = pd.read_sql(f'SELECT * FROM {table}', conn)
    file = '<?xml version="1.0" encoding="utf-8"?>\n'
    file += f'\t<{name}s>\n'
    for i, f in base.iterrows():
        file += f'\t\t<{name}>\n'
        for k, v in f.to_dict().items():
            if isinstance(v, list):
                file += f'\t\t\t<{k}>{", ".join(v)}</{k}>\n'
            else:
                file += f'\t\t\t<{k}>{v}</{k}>\n'
        file += f'\t\t</{name}>\n'
    file += f'\t</{name}s>\n'
    # print(file)
    with open(f'{name}.xml', 'w') as xml:
        xml.write(file)


def restore_database(file):
    base = et.parse(file, et.XMLParser(encoding='utf-8')).getroot()

    return base


if __name__ == '__main__':
    if sys.argv[1] == '1':
        send_email(get_email(int(sys.argv[2])), sys.argv[3], sys.argv[4])
    elif sys.argv[1] == '2':
        to_xml('Livro', 'livros')
    else:
        restore_database('Livro.xml')
    # print(restore_database('livro.xml'))
    # to_xml('Livro', 'livros')
