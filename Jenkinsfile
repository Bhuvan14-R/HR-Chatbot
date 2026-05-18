pipeline {

    agent any

    stages {

        stage('Build Docker Image') {

            steps {

                bat 'docker build -t hr-chatbot .'
            }
        }

        stage('Run Containers') {

            steps {

                bat 'docker-compose up -d'
            }
        }
    }
}