pipeline {
agent any

    stages {
        stage('Build')
        {
          steps {
            sh 'docker-compose build'
           }
        }
        stage('Unit Test')
        {
          steps {
            sh 'docker-compose up -d'
            sh  'echo "Executar testes unitarios"'
            sh 'docker-compose stop'
           }
        }
        stage('API tests')
        {
          steps {
           sh 'docker-compose up -d'
           sh 'echo "Executar testes de API"'
           sh 'docker-compose stop'
          }
        }
        stage('Security tests')
        {
          steps {
            sh 'echo "Testes de Segurança" '
          }
        }
        stage('Deploy')
        {
          steps {
            sh 'echo "Deploy em Producao" '
            sh 'docker-compose -f docker-compose.yml -f docker-compose.prod.yml config > stack.yml'
            sh 'docker stack deploy --compose-file stack.yml pgconf'           
          }
        }
     }
}