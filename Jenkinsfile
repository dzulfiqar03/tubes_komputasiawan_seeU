pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/dzulfiqar03/tubes_komputasiawan_seeU.git'
            }
        }
        stage('Send Dockerfile to Ansible') {
            steps {
                withCredentials([sshCredentials([id: 'seeU_website'])]) {
                    try {
                        sh 'ssh -o StrictHostKeyChecking=no user@ansible-server "mkdir -p Dockerfile"'
                        sh 'scp -o StrictHostKeyChecking=no Dockerfile user@ansible_server:Dockerfile'
                    } catch (Exception e) {
                        error "Gagal terhubung ke server Ansible: ${e.message}"
                    }
                }
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