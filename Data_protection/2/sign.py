# -*- coding: utf-8 -*-
import cmd
import sys
import os

print ('Выберите ключ:\n/s - Сканировать папку\n/v - Проверить подписи')
insert = input()
if insert == '/s':
    pathtofile = 'D:\\2'
    filelist = os.listdir(pathtofile)
    files = []
    for f in filelist:
            file = pathtofile + '\\' + f
            commandsign = 'gpg --no-tty --default-key NN@gmail.com --passphrase zxcasdqwe --detach-sign -b' + ' ' +file+''
            files.append(f)
            os.system(commandsign)
if insert =='/v':
    pathtofile = 'D:\\2'
    filelist = os.listdir(pathtofile)
    sign = []
    file = []
    for f in filelist:
        if '.sig' in f:
            signs = pathtofile + '\\' + f
            sign.append(signs)
    for ff in filelist:
        if not '.sig'in ff:
            files = pathtofile + '\\' + ff
            file.append(files)
    library = {}
    for x, y in zip(sign, file):
        library[x] = y
    for signf, filef in library.items():
        commantverify = 'gpg --verify' + ' ' +signf+' '+filef+ ''+'>>D:\\result.txt 2>&1'
        os.system(commantverify)
