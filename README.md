# pgconf2019
pgconf2019_demo


docker run -u root -p 8090:8080 -p 50000:50000 -v jenkins_home_new:/var/jenkins_home -v /var/run/docker.sock:/var/run/docker.sock -v $(which docker):/usr/bin/docker   jenkins/jenkins:lts