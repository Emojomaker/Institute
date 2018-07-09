# -*- coding: utf-8 -*-
import cmd
import sys
import os
import re

print ('Выберите действие:\n1)Подписать файлы\n2)Проверить целостность файлов')
select = input()
if select == '1':
    path = input('Введите адрес директории с файлами:\n ')
    filelist = os.listdir(path)
    files = []
    for f in filelist:
            file = path + '\\' + f
            createsign = 'gpg --no-tty --passphrase 123qazwsx --detach-sign -b' + ' ' +file+''
            files.append(f)
            os.system(createsign)
if select =='2':
    path = input('Введите адрес директории с файлами:\n ')
    filelist = os.listdir(path)
    sign = []
    file = []
    for f in filelist:
        if '.sig' in f:
            signs = path + '\\' + f
            sign.append(signs)
    for ff in filelist:
        if not '.sig'in ff:
            files = path + '\\' + ff
            file.append(files)
    dict_out = {}
    for x, y in zip(sign, file):
        dict_out[x] = y
    for signfile, filefile in dict_out.items():
        verify = 'gpg --verify' + ' ' +signfile+' '+filefile+''
        os.system(verify)
