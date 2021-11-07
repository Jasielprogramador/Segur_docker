
# Web-a

## Egileak: Janire Harana, Eneko Perez eta Asier Rosa

1. `git clone https://github.com/Jasielprogramador/Segur_docker.git`
2. `cd Segur_docker`
3. `sudo docker build -t "web" .`
4. `sudo docker-compose up`
5. [phpmyadmin ireki](http://localhost:8890)
6. User="admin" password="test"
7. "database" klikatu, ondoren "importar" klikatu, ondoren "examinar" klikatu, eta klonatutako repoaren barnean dagoen "database.sql" aukeratu, azkenik "continuar" klikatu
8. [Zure web-a ireki](http://localhost:81)
9. Erabiltzailea=asierrosa eta pasahitza=asier123
10. web-a ikusten amaitzen duzunean beste terminal batetik: `sudo docker-compose down`
