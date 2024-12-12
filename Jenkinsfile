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
                echo 'Executing Ansible Playbook'
                ansiblePlaybook colorized: true, credentialsId: 'seeU_website', inventory: 'hosts',extras: '-e host_group=\"tag_${TagKey}_${TagValue}\"', playbook: 'playbook/copy_dockerfile.yaml'
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