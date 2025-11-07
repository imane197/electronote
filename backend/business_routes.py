# Fichier : backend/business_routes.py
# Personne D - Backend Business

from flask import Blueprint, request, jsonify

# Création du Blueprint pour les routes business
business_bp = Blueprint('business', __name__)

@business_bp.route('/api/components', methods=['GET'])
def get_components():
    """Route pour récupérer la liste des composants"""
    # À implémenter avec la base de données
    return jsonify({"message": "Liste des composants - À implémenter"})

@business_bp.route('/api/my-project/add', methods=['POST'])
def add_to_project():
    """Route pour ajouter un composant au projet"""
    # À implémenter avec la base de données
    return jsonify({"message": "Ajout au projet - À implémenter"})

@business_bp.route('/api/my-project', methods=['GET'])
def get_my_project():
    """Route pour récupérer le projet utilisateur"""
    # À implémenter avec la base de données
    return jsonify({"message": "Projet utilisateur - À implémenter"})

@business_bp.route('/api/my-project/remove/<int:component_id>', methods=['DELETE'])
def remove_from_project(component_id):
    """Route pour supprimer un composant du projet"""
    # À implémenter avec la base de données
    return jsonify({"message": f"Suppression composant {component_id} - À implémenter"})
