// replace these values with those generated in your TokBox Account
var apiKey = "46187832";
var sessionId = "2_MX40NjE4NzgzMn5-MTUzNjg3MjgyMDk1OH5ydXBCdy8vMytMWWR5enAwMmJsOHJ5YjN-fg";
var token = "a83bb22a1ff0fe378a33fb9266027d710942484d";

// Handling all of our errors here by alerting them
function handleError(error) {
  if (error) {
    alert(error.message);
  }
}

// (optional) add server code here
//initializeSession();
// (optional) add server code here
    var SERVER_BASE_URL = 'https://webrtclawceylon.herokuapp.com';
    fetch(SERVER_BASE_URL + '/session').then(function(res) {
      return res.json()
    }).then(function(res) {
      apiKey = res.apiKey;
      sessionId = res.sessionId;
      token = res.token;
      initializeSession();
    }).catch(handleError);

function initializeSession() {
  var session = OT.initSession(apiKey, sessionId);


  // Create a publisher
  var publisher = OT.initPublisher('publisher', {
    insertMode: 'append',
    width: '100%',
    height: '100%'
  }, handleError);

  // Subscribe to a newly created stream
session.on('streamCreated', function(event) {
    session.subscribe(event.stream, 'subscriber', {
      insertMode: 'append',
      width: '100%',
      height: '100%'
    }, handleError);
});

  // Connect to the session
  session.connect(token, function(error) {
    // If the connection is successful, publish to the session
    if (error) {
      handleError(error);
    } else {
      session.publish(publisher, handleError);
    }
  });
}