<?php

#
# Respond to the blank command or to the help command
#
$app->post('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
   #return $this->renderer->render($response, 'index.phtml', $args);
	$data = "This is the tictactoe command";
	$response->withJson($data);
	return $response;
});



