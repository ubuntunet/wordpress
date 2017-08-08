ubuntunet.net Wordpress deployment using Trellis and Bedrock
============================================================

Server Setup
------------

See also: https://roots.io/trellis/docs/remote-server-setup/

Only do this when starting afresh or when there has been some changes to the underlying software and/or OS

```
cd trellis
ansible-galaxy install -r requirements.yml
```

This playbook gets run as the user 'ubuntu'. It doesn't harm to run it before every upgrade
```
cd trellis
ansible-playbook server.yml -e env=<environment>
```

Provisioning
------------

This playbook gets run as user 'web'. This user doesn't need root privileges.
```
cd trellis
./bin/deploy.sh <environment> <fqdn>
```


(Re)Install free plugins (ToDo - Integrated into the Playbook)

```
cd /srv/www/<fqdn>/current
sudo su web
composer update
```

Copy over the commercial plugins from ElegantThemes (If needed)

```
cd /srv/www/wordpress.ubuntunet.net/current
cp -pr releases/<last_releasedate>/web/app/plugins/monarch current/web/app/plugins/
cp -pr releases/<last_releasedate>/web/app/plugins/bloom current/web/app/plugins/
sudo service nginx restart
``


Upgrade with Subtree
--------------------

```
git subtree pull --prefix=trellis trellis master --squash
git subtree pull --prefix=site bedrock master --squash
```


Ansible Vault
-------------

To open the Trellis Vault, navigate into the Trellis directory and run 

```
ansible-vault [view|edit] group_vars/all/vault.yml 
```
replacing the path to the vault accordingly.