from util1 import TicTacToeUI, Player1, Player2
from random import shuffle

class TicTacToe:
    def __init__(self, player1, player2):
        if player1.mark == player2.mark:
            raise ValueError("players must not use the same mark")
        self.p1 = player1
        self.p2 = player2
        self.turn_order = [self.p1, self.p2]
        self.board = [None] * 9
        self.ties = 0
        self.win_lines = [[0, 1, 2], [3, 4, 5], [6, 7, 8], [0, 3, 6],
                          [1, 4, 7], [2, 5, 8], [0, 4, 8], [2, 4, 6]]
        self.UI = TicTacToeUI()
        self.UI.draw_grid()
        self.print_stats()
        self.start_game()
        self.UI.wn.mainloop()

    def start_game(self):
        self.players = self.turn_order.copy()
        first = self.players[0]
        if all(player.player_type == 'player1' for player in self.players):
            self.UI.display(first.name, 'top', first.color)
            self.UI.wn.onclick(self.human_game1)
        elif all(player.player_type == 'player2' for player in self.players):
            self.human_game2()
        else:
            if first.player_type == 'human1':
                self.take_turn1(first)
                self.players.reverse()
            elif first.player_type == 'human2':
                self.take_turn2(first)
                self.players.reverse()
            self.UI.wn.onclick(self.human_human_game)

    def human_game1(self, x, y):

        self.UI.wn.onclick(None)

        pos = self.get_position(x, y)

        if pos is None or self.board[pos] is not None:
            self.UI.wn.onclick(self.human_game1)
            return
        player = self.players[0]
        self.take_turn1(player, pos)
        if self.check_if_won(self.board, player.mark):
            self.end_game(player)
            return
        elif None not in self.board:
            self.end_game('tie')
            return
        self.players.reverse()

        self.UI.wn.onclick(self.human_game1)
        self.UI.display(self.players[0].name, 'top', self.players[0].color)

    def human_game2(self, x, y):

        self.UI.wn.onclick(None)

        pos = self.get_position(x, y)

        if pos is None or self.board[pos] is not None:
            self.UI.wn.onclick(self.human_game2)
            return
        player = self.players[0]
        self.take_turn2(player, pos)
        if self.check_if_won(self.board, player.mark):
            self.end_game(player)
            return
        elif None not in self.board:
            self.end_game('tie')
            return
        self.players.reverse()

        self.UI.wn.onclick(self.human_game2)
        self.UI.display(self.players[0].name, 'top', self.players[0].color)

    def human_human_game(self, x, y):

        self.UI.wn.onclick(None)
        usr_pos = self.get_position(x, y)
        if usr_pos is None or self.board[usr_pos] is not None:
            self.UI.wn.onclick(self.human_human_game)
            return
        for player in self.players:
            if player.player_type == 'player1':
                self.take_turn1(player, usr_pos)
            elif player.player_type == 'player2':
                self.take_turn2(player, usr_pos)
            if self.check_if_won(self.board, player.mark):
                self.end_game(player)
                return
            elif None not in self.board:
                self.end_game('tie')
                return
        self.UI.wn.onclick(self.human_human_game)

    def print_stats(self):

        stats_text = (
            f"{self.p1.name} ({self.p1.mark}): {self.p1.wins}   Ties: "
            f"{self.ties}   {self.p2.name} ({self.p2.mark}): {self.p2.wins}")
        self.UI.display(stats_text, 'bottom')

    def get_position(self, x, y):

        if x > -225 and x < -75 and y > 75 and y < 225:
            position = 0
        elif x > -75 and x < 75 and y > 75 and y < 225:
            position = 1
        elif x > 75 and x < 225 and y > 75 and y < 225:
            position = 2
        elif x > -225 and x < -75 and y > -75 and y < 75:
            position = 3
        elif x > -75 and x < 75 and y > -75 and y < 75:
            position = 4
        elif x > 75 and x < 225 and y > -75 and y < 75:
            position = 5
        elif x > -225 and x < -75 and y > -225 and y < -75:
            position = 6
        elif x > -75 and x < 75 and y > -225 and y < -75:
            position = 7
        elif x > 75 and x < 225 and y > -225 and y < -75:
            position = 8
        else:
            position = None
        return position

    def take_turn1(self, player, position):

        self.board[position] = player.mark
        print(player.name, "marks section", position)
        self.UI.mark(player.mark, position, player.color)

    def take_turn2(self, player, position):

        self.board[position] = player.mark
        print(player.name, "marks section", position)
        self.UI.mark(player.mark, position, player.color)

    def check_if_won(self, board, mark):

        return any(all(board[p] == mark for p in l) for l in self.win_lines)

    def end_game(self, winner):

        if winner == 'tie':
            self.ties += 1
            msg = "Tie Game"
            color = 'black'
        else:
            winner.wins += 1
            msg = "{} Wins!".format(winner.name)
            color = winner.color
        self.UI.display(msg, 'top', color)
        print(msg, "\n")
        self.print_stats()
        self.UI.wn.onclick(self.reset)

    def reset(self, *_):

        self.UI.wn.onclick(None)
        self.UI.t_top_text.clear()
        self.UI.t_marks.clear()
        self.board = [None] * 9
        self.turn_order.reverse()
        self.start_game()


def main():

    p1 = Player1("Player1", 'x')
    p2 = Player2("Player2", 'o')
    game = TicTacToe(p1, p2)


if __name__ == '__main__':
    main()