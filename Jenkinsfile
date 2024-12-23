pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "laravel-app"
        CONTAINER_ID = "0e9c08a7bca2f66aef8a3d0db233d0aa3b45f3df8c8be2343938dc01ad03f112"
        APP_PORT = "3307:3307"
        MYSQL_CONTAINER_ID = "5f0d6dfa05375624554be3cfb01bcf989b5996ada084b8ba3132c4c948b79465"
        MYSQL_IMAGE = " mysql:8.0"
        MYSQL_ROOT_PASSWORD = "password"
    }

    stages {
		stage('Git Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/dzulfiqar03/tubes_komputasiawan_seeU.git'
            }
        }

        stage('Setup PHP Container') {
            steps {
                script {
                    echo "Container ID: 0e9c08a7bca2f66aef8a3d0db233d0aa3b45f3df8c8be2343938dc01ad03f112"
                    
                    echo 'Verifying PHP container is running...'
                }
            }
        }
        
        stage('Setup MySQL Container') {
            steps {
                script {
                    echo "Container ID: 5f0d6dfa05375624554be3cfb01bcf989b5996ada084b8ba3132c4c948b79465"

                    echo 'Verifying MySQL container is running...'
                }
            }
        }
    }

    post {
        always {
            echo 'Cleaning up Docker resources...'
            sh "docker stop 0e9c08a7bca2f66aef8a3d0db233d0aa3b45f3df8c8be2343938dc01ad03f112 || true"
        }
    }
}