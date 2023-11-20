import turtle as t

class TicTacToeUI:

    def __init__(self):
        self.wn = t.Screen()
        self.wn.title("Welcome to Tic Tac Toe!")

        self.t_grid = t.Turtle()
        self.t_marks = t.Turtle()
        self.t_top_text = t.Turtle()
        self.t_bottom_text = t.Turtle()
        for turtle in self.wn.turtles():
            turtle.hideturtle()
            turtle.speed(0)
        self.t_grid.pensize(2)
        self.t_marks.pensize(4)

        self._mid_cors = [(-150, 150), (0, 150), (150, 150), (-150, 0), (0, 0),
                          (150, 0), (-150, -150), (0, -150), (150, -150)]

        self._mv(self.t_top_text, 0, 275)
        self._mv(self.t_bottom_text, 0, -295)

    def _mv(self, turtle, x, y):
        turtle.pu()
        turtle.goto(x, y)
        turtle.pd()

    def _draw_x(self, x, y):
        self._mv(self.t_marks, x + 50, y + 50)
        self.t_marks.goto(self.t_marks.xcor() - 100, self.t_marks.ycor() - 100)
        self._mv(self.t_marks, self.t_marks.xcor(), self.t_marks.ycor() + 100)
        self.t_marks.goto(self.t_marks.xcor() + 100, self.t_marks.ycor() - 100)

    def _draw_o(self, x, y):
        self._mv(self.t_marks, x, y - 50)
        self.t_marks.circle(50)

    def draw_grid(self):

        for cor in [75, -75]:
            self._mv(self.t_grid, -225, cor)
            self.t_grid.setx(225)
            self._mv(self.t_grid, cor, 225)
            self.t_grid.sety(-225)

    def mark(self, mark, position, color='black'):

        self.t_marks.pencolor(color)
        cor = self._mid_cors[position]
        if mark == 'x':
            self._draw_x(*cor)
        else:
            self._draw_o(*cor)

    def display(self, text, position, color='black'):

        t_text = self.t_top_text if position == 'top' else self.t_bottom_text
        t_text.clear()
        t_text.pencolor(color)
        t_text.write(text, False, 'center', ('Arial', 20, 'normal'))


class Player:

    def __init__(self, name, mark):

        if mark not in ['x', 'o']:
            raise ValueError("player mark must be 'x' or 'o'")
        self.name = name
        self.mark = mark
        self.color = 'blue' if mark == 'x' else 'red'
        self.wins = 0


class Player1(Player):
    player_type = "player1"


class Player2(Player):
    player_type = "player2"