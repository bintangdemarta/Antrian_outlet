import os
from gtts import gTTS
import pygame
import tkinter as tk
from tkinter import messagebox

# Inisialisasi pygame mixer
pygame.mixer.init()

def play_sound(file):
    pygame.mixer.music.load(file)
    pygame.mixer.music.play()
    while pygame.mixer.music.get_busy():
        pygame.time.Clock().tick(10)

def call_queue_number(number):
    text = f"Nomor antrian {number}, silakan menuju ke loket"
    tts = gTTS(text=text, lang='id')
    filename = f"queue_{number}.mp3"
    tts.save(filename)
    play_sound(filename)
    os.remove(filename)

def take_queue_number():
    global current_number
    current_number += 1
    messagebox.showinfo("Nomor Antrian", f"Nomor antrian Anda: {current_number}")
    call_queue_number(current_number)

# Inisialisasi nomor antrian
current_number = 0

# Buat antarmuka pengguna
root = tk.Tk()
root.title("Sistem Antrian")

frame = tk.Frame(root, padx=20, pady=20)
frame.pack(padx=10, pady=10)

label = tk.Label(frame, text="Sistem Antrian", font=("Arial", 24))
label.pack(pady=10)

button = tk.Button(frame, text="Ambil Nomor Antrian", font=("Arial", 18), command=take_queue_number)
button.pack(pady=20)

root.mainloop()
