pipeline {
agent {
    docker { image 'docker'  }
    }

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
            sh 'docker-compose up'
            sh "echo Teste"
           }
        }
        stage('API tests')
        {
          steps {
            sh "inspec exec inspec/aws -t aws://us-east-1 --reporter junit:inspec/reports/aws.xml"
            sh 'echo "Teste de infra estrutura" '
          }
          post {
            always{
              junit 'inspec/reports/*.xml'
            }
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
              credentialsId: '849b3132-11ee-48d0-abb1-012d122c233d',
              extras: '--extra-vars "branch=prod"'
              )
           
          }
        }
     }
}