from subprocess import call
import turtle

screen = turtle.Screen()
screen.setup(700, 500)
screen.title("Main Menu")
screen.bgcolor("green")

pen = turtle.Turtle()
pen.color("green")
pen.hideturtle()
pen.speed(0)
pen.setheading(90)

pen.begin_fill()
pen.fd(250)
pen.setheading(0)
pen.fd(450)
pen.setheading(270)
pen.fd(500)
pen.setheading(180)
pen.fd(450)
pen.setheading(90)
pen.fd(250)
pen.end_fill()

title = turtle.Turtle()
title.penup()
title.speed(0)
title.hideturtle()
title.goto(0, 180)
title.write("Main Menu", align="center", font=("Verdana", 30, "bold"))

opt = turtle.Turtle()
opt.speed(0)
opt.penup()
opt.goto(0, 100)
opt.write("Play", align="center", font=("Verdana", 20, "bold"))
opt.hideturtle()
# screen.register_shape("human.png")
# opt.shape("human.png")

# opt1 = turtle.Turtle()
# opt1.speed(0)
# opt1.penup()
# opt1.goto(0, 20)
# opt1.write("Human vs Bot", align="center", font=("Verdana", 20, "bold"))
# opt1.hideturtle()
# screen.register_shape("bot.png")
# opt1.shape("bot.png")

def click(x, y):
    if x > opt.xcor() - 63 and x < opt.xcor() + 63 and y > opt.ycor() - 25 and y < opt.ycor() + 25:
        screen.exitonclick()
        def open_py_file():
            call(["python", "tictactoe.py"])

        open_py_file()

    # if x > opt1.xcor() - 63 and x < opt1.xcor() + 63 and y > opt1.ycor() - 25 and y < opt1.ycor() + 25:
    #     screen.exitonclick()
    #
    #     def open_py_file():
    #         call(["python", "tictactoe.py"])
    #
    #     open_py_file()

turtle.listen()
turtle.onscreenclick(click, 1)
turtle.done()