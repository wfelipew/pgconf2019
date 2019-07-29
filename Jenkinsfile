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
            sh 'echo "Producao" '
            // sh 'git checkout master'
            // sh 'git pull origin master'
            ansiblePlaybook (
              inventory: 'inventory/',
              playbook: 'newplaybook.yml',
              colorized: true,
              credentialsId: '',
              extras: '--extra-vars "branch=prod"'
              )
           
          }
        }
     }
}