from util import TicTacToeUI, HumanPlayer, BotPlayer
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
        self.start_game()
        self.UI.wn.mainloop()

    def start_game(self):
        self.players = self.turn_order.copy()
        first = self.players[0]
        if all(player.player_type == 'human' for player in self.players):
            self.UI.display(first.name, 'top', first.color)
            self.UI.wn.onclick(self.human_game)
        elif all(player.player_type == 'bot' for player in self.players):
            self.bot_game()
        else:
            if first.player_type == 'bot':
                self.bot_take_turn(first)
                self.players.reverse()
            self.UI.wn.onclick(self.human_bot_game)

    def human_game(self, x, y):

        self.UI.wn.onclick(None)

        pos = self.get_position(x, y)

        if pos is None or self.board[pos] is not None:
            self.UI.wn.onclick(self.human_game)
            return
        player = self.players[0]
        self.take_turn(player, pos)
        if self.check_if_won(self.board, player.mark):
            self.end_game(player)
            return
        elif None not in self.board:
            self.end_game('tie')
            return
        self.players.reverse()

        self.UI.wn.onclick(self.human_game)
        self.UI.display(self.players[0].name, 'top', self.players[0].color)

    def bot_game(self):

        while None in self.board:
            self.bot_take_turn(self.players[0])
            if self.check_if_won(self.board, self.players[0].mark):
                self.end_game(self.players[0])
                return
            self.players.reverse()
        self.end_game('tie')

    def human_bot_game(self, x, y):

        self.UI.wn.onclick(None)
        usr_pos = self.get_position(x, y)
        if usr_pos is None or self.board[usr_pos] is not None:
            self.UI.wn.onclick(self.human_bot_game)
            return
        for player in self.players:
            if player.player_type == 'human':
                self.take_turn(player, usr_pos)
            else:
                self.bot_take_turn(player)
            if self.check_if_won(self.board, player.mark):
                self.end_game(player)
                return
            elif None not in self.board:
                self.end_game('tie')
                return
        self.UI.wn.onclick(self.human_bot_game)

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

    def take_turn(self, player, position):

        self.board[position] = player.mark
        print(player.name, "marks section", position)
        self.UI.mark(player.mark, position, player.color)

    def bot_take_turn(self, player):

        self.minimax_calls = 0
        pos, score = self.minimax_choose_pos(self.board, player.mark)
        print(f"Minimax score: {score}, function calls: {self.minimax_calls}")
        self.take_turn(player, pos)

    def minimax_choose_pos(self, board, turn):

        self.minimax_calls += 1
        opponent = 'o' if turn == 'x' else 'x'
        empty_pos = [pos for pos in range(9) if not board[pos]]
        shuffle(empty_pos)
        max_score = -10
        for pos in empty_pos:

            new_board = board.copy()
            new_board[pos] = turn

            if self.check_if_won(new_board, turn):
                score = 1
            elif self.check_if_won(new_board, opponent):
                score = -1
            elif None not in new_board:
                score = 0
            else:

                score = -self.minimax_choose_pos(new_board, opponent)[1]

            if score == 1:

                return (pos, score)
            if score > max_score:
                best_pos = pos
                max_score = score
        return (best_pos, max_score)

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
        self.UI.wn.onclick(self.reset)

    def reset(self, *_):

        self.UI.wn.onclick(None)
        self.UI.t_top_text.clear()
        self.UI.t_marks.clear()
        self.board = [None] * 9
        self.turn_order.reverse()
        self.start_game()


def main():

    p1 = HumanPlayer("Player", 'x')
    p2 = BotPlayer("Bot", 'o')
    game = TicTacToe(p1, p2)


if __name__ == '__main__':
    main()