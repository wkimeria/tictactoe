<?php

#
# Respond to the blank command or to the help command
#



$app->post('/[{name}]', function ($request, $response, $args) {

	$inputs = validate_and_fetch_args($request);

	#
	# Validate input arguments
	#

	if(!$inputs){
		$response = $response->withStatus(400, "Invalid token passed");
		$response->write("Invalid token passed!");
		return $response;

	}

	$text = $inputs['text'];

	switch($text)
	{
		case 'help';
			$response_text = $this->TicTacToeService->build_help_text($request);;


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

function validate_token($token){
	if(!$token) return false;
	return $token == "fr272jM9bDw09VMO3s49c3JL";
}

#
# Validate arguments
#
function validate_and_fetch_args($request){
	
	$parsedBody = $request->getParsedBody();

	# validate token
	$token = validate_token($parsedBody['token']);

	if(!$token) return false;

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
