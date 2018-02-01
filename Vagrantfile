# -*- mode: ruby -*-
# vi: set ft=ruby :

# KAYNAK: https://box.scotch.io/
# KAYNAK: https://www.vagrantup.com/

# Durum : vagrant status
# Kapat : vagrant halt
# Uyu   : vagrant suspend
# Uyan  : vagrant resume
# Yok Et: vagrant destroy
# Başlat: vagrant up
# Bağlan: vagrant ssh
# Ayarları Yeniden Yükle: vagrant reload --provision
# vagrant box update : Vagrant Box dosyasını güncelle

# KAYNAK: https://scotch.io/bar-talk/announcing-scotch-box-2-0-our-dead-simple-vagrant-lamp-stack-improved#multiple-domains-(virtual-hosts)

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.hostname = "VagrantNuri4"
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "scotchbox4"
    config.vm.synced_folder ".", "/var/www/public", :mount_options => ["dmode=777", "fmode=666"]

#config.ssh.username = "vagrant"
#config.ssh.password = "vagrant"


    config.vm.provision "shell", inline: <<-SHELL
        echo 'Merhaba! Vagrant için özel ayarlarınız uygulanıyor...'

        timedatectl set-timezone Europe/Istanbul

    # Vagrant kurulurken veya Provision sırasında web sitesi root dizinindeki bu dosyayı kullanarak MySQL içini doldur
    # mysql -u root -proot scotchbox < /var/www/public/dump.sql

    # PHP için ayarlamalarımızı yapalım...

        echo 'echo "#####################"         >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "# Özel ayarlarımız"            >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "display_startup_errors = On"   >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "display_errors         = On"  >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "short_open_tag         = On"   >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "opcache.enable         = 0"    >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "upload_max_filesize    = 128M" >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "upload_max_size        = 128M" >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "post_max_size          = 128M" >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "max_input_vars         = 5000" >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "error_reporting            = E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE"  >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "mbstring.language          = Turkish"  >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "mbstring.internal_encoding = UTF-8"    >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        echo 'echo "disable_functions          = exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source"  >> /etc/php5/apache2/conf.d/user.ini' | sudo -s
        sudo service apache2 restart


    # MySQL için ayarlamalarımızı yapalım...
        echo 'echo "#####################" >> /etc/mysql/my.cnf'              | sudo -s
        echo 'echo "# Özel ayarlarımız" >> /etc/mysql/my.cnf'                 | sudo -s
        echo 'echo "[client]" >> /etc/mysql/my.cnf'                           | sudo -s
        echo 'echo "default-character-set=utf8" >> /etc/mysql/my.cnf'         | sudo -s
        echo 'echo "[mysql]" >> /etc/mysql/my.cnf'                            | sudo -s
        echo 'echo "default-character-set=utf8" >> /etc/mysql/my.cnf'         | sudo -s
        echo 'echo "[mysqld]" >> /etc/mysql/my.cnf'                           | sudo -s
        echo 'echo "collation-server = utf8_unicode_ci" >> /etc/mysql/my.cnf' | sudo -s
        echo 'echo "init-connect=\'SET NAMES utf8\'" >> /etc/mysql/my.cnf'      | sudo -s
        echo 'echo "character-set-server = utf8" >> /etc/mysql/my.cnf'        | sudo -s
        sudo service mysql restart

    SHELL


    config.vm.provider "virtualbox" do |vb|
        # Display the VirtualBox GUI when booting the machine
        vb.gui = false
        vb.name = "Websites_Nuri4"
        # Customize the amount of memory on the VM:
        vb.memory = "512"
    end

end
