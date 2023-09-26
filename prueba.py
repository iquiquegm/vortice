import mysql.connector
import tkinter as tk
from tkinter import messagebox

# Connect to the database
db = mysql.connector.connect(
    host="localhost",
    user="enrique",
    password="3nri9u3",
    database="vortice"
)

# Create a cursor object to execute SQL queries
cursor = db.cursor()

# Define the login function
def login():
    # Get the username and password from the entry widgets
    username = username_entry.get()
    password = password_entry.get()

    # Validate the credentials
    cursor.execute("SELECT * FROM usuarios WHERE usuario = %s AND password = %s", (username, password))
    result = cursor.fetchone()

    if result:
        # If the credentials are valid, close the login window and open a new window with a width of 300px and a height of 200px
        root.destroy()
        new_root = tk.Tk()
        new_root.title("Nuevo ventana")
        new_root.geometry("600x400")
        new_root.mainloop()
    else:
        # If the credentials are invalid, display an error message
        messagebox.showerror("Error", "Usuario o contraseña incorrectos")

# Create the login window
root = tk.Tk()
root.title("Login")

# Create the username label and entry widget
username_label = tk.Label(root, text="Usuario:")
username_label.pack()
username_entry = tk.Entry(root)
username_entry.pack()

# Create the password label and entry widget
password_label = tk.Label(root, text="Contraseña:")
password_label.pack()
password_entry = tk.Entry(root, show="*")
password_entry.pack()

# Create the login button
login_button = tk.Button(root, text="Iniciar sesión", command=login)
login_button.pack()

# Start the main loop
root.mainloop()

