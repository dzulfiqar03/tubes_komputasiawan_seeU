pipeline {
    agent any
    tools {
        ansible 'ansible-2.9'
        docker 'docker-19.03.1'
    }
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/your/repository.git'
            }
        }
        stage('Send Dockerfile to Ansible') {
            steps {
                sh 'scp Dockerfile user@ansible-server:/path/to/dockerfile'
            }
        }
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t my-image .'
            }
        }
        stage('Push Image to Docker Hub') {
            steps {
                sh 'docker push my-image'
            }
        }
        stage('Copy Files to Kubernetes') {
            steps {
                sh 'scp file1.txt user@kubernetes-server:/path/to/destination'
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                ansiblePlaybook playbook: 'deploy.yml'
            }
        }
    }
}