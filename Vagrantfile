# -*- mode: ruby -*-
# vi: set ft=ruby :

def Kernel.is_windows?
    # Detect if we are running on Windows
    processor, platform, *rest = RUBY_PLATFORM.split("-")
    platform == 'mingw32'
end

Vagrant::Config.run do |config|
  # Define VM box to use
  config.vm.box = "precise32"
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"

  # Increase memory of the VM
  config.vm.customize ["modifyvm", :id, "--memory", 512]

  # Define hostname to be used with Hostmaster
  config.vm.host_name = "fliptest.local"
  config.hosts.name = "fliptest.local"

  # Use hostonly network with a static IP Address
  config.vm.network :hostonly, "172.90.90.90"

  # Set share folder
  use_nfs = !Kernel.is_windows?
  config.vm.share_folder "public" , "/home/vagrant/public", "./", :nfs => use_nfs

  # Enable and configure chef solo
  config.vm.provision :chef_solo do |chef|
    chef.cookbooks_path = ["~/bin/dirt/cookbooks"]
    chef.add_recipe "apt"
    chef.add_recipe "openssl"
    chef.add_recipe "apache2"
    chef.add_recipe "apache2::mod_php5"
    chef.add_recipe "apache2::mod_rewrite"
    chef.add_recipe "mysql"
    chef.add_recipe "mysql::server"
    chef.add_recipe "memcached"
    chef.add_recipe "php"
    chef.add_recipe "misc::packages"
    chef.add_recipe "misc::vhost"
    chef.add_recipe "misc::db"
    chef.json = {
      :misc => {
        :name           => "fliptest",
        :db_user        => "fliptest",
        :db_pass        => "xGbFreXMijTQc3",
        :db_name        => "fliptest",
        :db_dir         => "/home/vagrant/public/db",
        :server_name    => "fliptest.local",
        :server_aliases => "*.fliptest.local",
        :docroot        => "/home/vagrant/public/public",
      },
      :mysql => {
        :server_root_password   => 'root',
        :server_repl_password   => 'root',
        :server_debian_password => 'root',
        :bind_address           => '172.90.90.90',
        :allow_remote_root      => true
      }
    }
  end
end