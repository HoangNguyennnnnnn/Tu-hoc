import speech_recognition
import pyttsx3
from datetime import date, datetime

while 1==1:
    #Nghe
    robot_ear = speech_recognition.Recognizer()
    with speech_recognition.Microphone() as mic:
        print("Robot: I'm hearing")
        audio = robot_ear.listen(mic)
    try:
        you = robot_ear.recognize_google(audio)
    except:
        you = ""
    print("You: " + you)

    #Understand
    if you =="":
        robot_brain = "I can't hear you, say again"
    elif "hello" in you :
        robot_brain = "Hello"
    elif "today" in you:
        today = date.today()
        robot_brain = today.strftime("%B %d, %Y")
    elif "time" in you:
        now = datetime.now()
        robot_brain = now.strftime("%H hours %M minutes %S seconds")
    elif "bye" in you:
        robot_brain = "Goodbye"
        robot_mouth = pyttsx3.init()
        robot_mouth.say(robot_brain)
        robot_mouth.runAndWait()
    else :
        robot_brain = "Ok"
    print("Robot: " +  robot_brain)

    #Talk
    robot_mouth = pyttsx3.init()
    robot_mouth.say(robot_brain)
    robot_mouth.runAndWait()

