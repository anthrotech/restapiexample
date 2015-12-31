# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "wiw-codetest"

  config.vm.network "forwarded_port", guest: 80, host: 8080 
  # config.vm.network "private_network", ip: "192.168.33.10"
  # config.vm.network "public_network"
  config.ssh.forward_agent = true
  config.vm.synced_folder "./", "/home/vagrant/code"
  # config.vm.provider "virtualbox" do |vb|
  #   # Don't boot with headless mode
  #   vb.gui = true
  #
  #   # Use VBoxManage to customize the VM. For example to change memory:
  #   vb.customize ["modifyvm", :id, "--memory", "1024"]
  # end
  config.vm.provision "file", source: "test-httpd.conf", destination: "/tmp/test-httpd.conf"
  config.vm.provision "shell", path: "./provisioner"
  config.vm.provision "shell", inline: "sudo service apache2 restart", run: "always"
end
