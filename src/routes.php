<?php

#
# Respond to the blank command or to the help command
#

$app->post('/[{name}]', function ($request, $response, $args) {

	$inputs = validate_and_fetch_args($request);

	$text = $inputs['text'];

	switch($text)
	{
		case 'help';
			$response_text = "Hello :wave::skin-tone-6: !\n Welcome to Tic Tac Toe. Here are the rules of the game\n You can challenge another user to a game. Here are the commands to do so\n
				`/tictactoe help` : Shows this screen\n
				`/tictactoe challenge @username` : Challenges the given user to a game\n
				`tictactoe forfeit` : Forfeits the game to another user.
				`tictactoe move [0-9]` : move to the next grid, numbered 1 - 9 as follows\n
				\n
				| :one:  | :two: | :three:|\n
				| :four: | :five: | :six: |\n
				| :seven: | :eight: | :nine: |\n
				\n";


			break;
		case 'challenge';
			$response_text = ":fightclub: You challenged";
			break;
		case 'forfeit';
			$response_text = ":frowning: You forfeited";
			break;
		default;
			$response_text = ":shrug: I have no idea what you asked about!";
			break;
	}

    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");


	return $response_text;
});

#
# Validate arguments
#
function validate_and_fetch_args($request){
	
	$parsedBody = $request->getParsedBody();

	# validate token
	$token = $parsedBody['token'];

	$team_id = $parsedBody['team_id'];

	$team_domain = $parsedBody['team_domain'];

	$channel_id = $parsedBody['channel_id'];

	$channel_name = $parsedBody['channel_name'];

	$user_id = $parsedBody['user_id'];

	$user_name = $parsedBody['user_name'];

	$command = $parsedBody['command'];

	$text = $parsedBody['text'];

	$response_url = $parsedBody['response_url'];

	$ret = array(
		'token' => $token,
		'team_id' => $team_id,
		'team_domain' => $team_domain,
		'channel_id' => $channel_id,
		'channel_name' => $channel_name,
		'user_id' => $user_id,
		'user_name' => $user_name,
		'command' => $command,
		'text' => $text,
		'response_url' => $response_url,
		);

	return $ret;
}
