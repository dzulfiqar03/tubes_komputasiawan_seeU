pipeline {
    agent any
	tools {
        ansible 'ansible-2.9'
    }
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/dzulfiqar03/tubes_komputasiawan_seeU.git'
            }
        }
        stage('Send Dockerfile to Ansible') {
            steps {
                sh 'scp Dockerfile user@ansible-server:Dockerfile'
            }
        }
        stage('Build Docker Image') {
            steps {
                sh 'docker build -t seeU_website .'
            }
        }
        stage('Push Image to Docker Hub') {
            steps {
                sh 'docker push seeU_website'
            }
        }
        stage('Copy Files to Kubernetes') {
            steps {
                sh 'scp file1.txt user@kubernetes-server:./'
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                ansiblePlaybook playbook: 'deploy.yml'
            }
        }
    }
}