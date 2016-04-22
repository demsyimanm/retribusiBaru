#!/usr/bin/python
import MySQLdb
import time
import sys
try:
    j=1
    i=1
    db_tunggak            = MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
    cursor_tunggak        = db_tunggak.cursor()
    db_retribusi            = MySQLdb.connect("10.151.63.12", "retribusi", "retribusi", "retribusi")
    cursor_retribusi        = db_retribusi.cursor()
    while True:
        try:
            sql_retribusi   = '''select id, pelanggan_id, tgl_lunas, bulan, tahun from retribusipemerintah where status_cek = 0'''
            tanda           = 0
            temp            = cursor_retribusi.execute(sql_retribusi)
            if (temp != 0): 
                tanda = 1

            elif (temp == 0):
                print "tidak ada yg nol "+str(j)
                # time.sleep(1800)
                j+=1
                sys.exit(0)

            if (tanda==1):
                unchecked = cursor_retribusi.fetchone()
                if (unchecked is not None):
                    id_retribusi    = unchecked[0]
                    no_plg_ret      = unchecked[1]
                    tgl_lunas       = unchecked[2]
                    bulan           = unchecked[3]
                    tahun           = unchecked[4]

                    sql             = '''select * from tunggakanpemerintah where pelanggan_id ='''+str(no_plg_ret)+'''having min(pelanggan_id)'''
                    sql_exec        = cursor_tunggak.execute(sql)
                    tunggak         = cursor_tunggak.fetchone()
                    if (ret_plg is not None):
                        id_tunggak      = tunggak[0]
                        pelanggan_id    = tunggak[1]
                        nama            = tunggak[2]
                        jalan           = tunggak[3]
                        gang            = tunggak[4]
                        nomor           = tunggak[5]
                        notamb          = tunggak[6]
                        da              = tunggak[7]
                        kd_tarif        = tunggak[8]
                        retribusi       = tunggak[9]
                        listrik         = tunggak[10]
                        lbr_jalan       = tunggak[11]
                        periode_tagih   = tunggak[12]
                        ketstatus       = tunggak[13]

                        insert              = '''insert into lunaspemerintah (pelanggan_id, nama, jalan, gang, nomor, notamb, da, kd_tarif, retribusi, listrik, lbr_jalan, periode_tagih, ketstatus, tgl_lunas, bulan, tahun) values('''+tunggak[1]+''','''+str(tunggak[2])+''','''+str(tunggak[3])+''','''+str(tunggak[4])+''','''+str(tunggak[5])+''','''+str(tunggak[6])+''','''+str(tunggak[7])+''','''+str(tunggak[8])+''','''+tunggak[9]+''','''+tunggak[10]+''','''+tunggak[11]+''','''+tunggak[12]+''','''+str(tunggak[13])+''','''+str(tgl_lunas)+''','''+str(bulan)+''','''+str(tahun)+''')'''
                        insert_exec         = cursor_tunggak.execute(insert)
                        delete              = '''delete from tunggakanpemerintah where id='''+str(tunggak[0]) 
                        delete_exec         = cursor_tunggak.execute(delete)
                        if (insert_exec and delete_exec):
                            update_status           = '''update retribusipemerintah set status_cek = 1 where id = '''+str(id_retribusi)
                            update_status_exec      = cursor_retribusi.execute(update_status)
                            if (update_status_exec):
                                print 'sukses semua'
                            else:
                                print 'gagal update status'
                        elif (not insert_exec and delete_exec):
                            print 'gagal insert'
                        elif (insert_exec and not delete_exec):
                            print 'gagal delete'
                    else:
                        print 'tidak nunggak'
                    i+=1
                db_retribusi.commit()
        except:
            print 'masuk except'
            i+=1
            db_retribusi.commit()
            sys.exit(0)
    db_tunggak.close()
    db_retribusi.close()
except KeyboardInterrupt:
  sys.exit(0)
except:
  print 'berhenti'
  # execfile(retribusi.py)