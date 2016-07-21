<?php

# 
# The TicTacToe service
#
namespace Kimeria;

final class TicTacToeService
{
	#
	# Return help text
	#

	public function build_help_text($request){

		$username = $this->get_username($request);

		$result = "Hello @$username :wave::skin-tone-6: !\n Welcome to Tic Tac Toe. Here are the rules of the game\n You can challenge another user to a game. Here are the commands to do so\n
			`/tictactoe help` : Shows this screen\n
			`/tictactoe challenge @username` : Challenges the given user to a game\n
			`tictactoe forfeit` : Forfeits the game to another user.
			`tictactoe move [0-9]` : move to the next grid, numbered 1 - 9 as follows\n
			\n
			| :one:  | :two: | :three:|\n
			| :four: | :five: | :six: |\n
			| :seven: | :eight: | :nine: |\n
			\n";

		return $result; 
	}

	public function get_username($request){

		$parsedBody = $request->getParsedBody();

		return $parsedBody['user_name'];
	}
}

