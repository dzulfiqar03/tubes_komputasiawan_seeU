pipeline {
    agent any

    environment {
        DOCKER_IMAGE = "laravel_web"
        CONTAINER_ID = "0e9c08a7bca2f66aef8a3d0db233d0aa3b45f3df8c8be2343938dc01ad03f112"
        APP_PORT = "8000:80"
        MYSQL_CONTAINER_ID = "5f0d6dfa05375624554be3cfb01bcf989b5996ada084b8ba3132c4c948b79465"
        MYSQL_IMAGE = " mysql:8.0"
        MYSQL_ROOT_PASSWORD = "password"
        PHPMYADMIN_CONTAINER_ID = "f0058e1f9efbb3af431f298bdd181f65dd9f6d5708cfe846298299af5e9514c7"
        PHPMYADMIN_IMAGE = " phpmyadmin/phpmyadmin:5.0.2"
        dockerImage = 'dzulfiqar23/seeu'
    }

    stages {
		stage('Git Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/dzulfiqar03/tubes_komputasiawan_seeU.git'
            }
        }

        stage('Build Docker') {
            steps {
                script {
                    sh "docker build -t dzulfiqar23/tubes_see:latest ."
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