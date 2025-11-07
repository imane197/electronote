# Fichier : backend/database.py
# Personne D - Backend Business

import mysql.connector
from mysql.connector import Error

def get_db_connection():
    """
    Connexion à la base de données MySQL
    À configurer avec les vraies credentials plus tard
    """
    try:
        connection = mysql.connector.connect(
            host='localhost',
            user='root', 
            password='',
            database='composants_db'
        )
        print("✅ Connexion MySQL réussie")
        return connection
    except Error as e:
        print(f"❌ Erreur connexion MySQL: {e}")
        return None

def test_connection():
    """Test de la connexion à la base"""
    conn = get_db_connection()
    if conn:
        conn.close()
        return True
    return False
