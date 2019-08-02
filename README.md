# pgconf2019
pgconf2019_demo


Subir aplicacao local:

```
docker-compose -f docker-compose.yml -f docker-compose.local.yml  up
```


Subir jenkins:

```
docker run -u root -p 8090:8080 -p 50000:50000 -v jenkins_home_new:/var/jenkins_home -v /var/run/docker.sock:/var/run/docker.sock -v $(which docker):/usr/bin/docker -v $(which docker-compose):/usr/bin/docker-compose    jenkins/jenkins:lts
```


Consultar migrations:

```
docker exec -it php vendor/bin/phinx status
```


Acessar o postgres:

```
docker exec -u postgres -it banco psql
```