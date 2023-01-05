<?php
  $variables = [
      'token' => 'IGQVJXTzRPVDIyU011NnNrSEdkYjJiRXVFckZAUQ1pGSXEzSTloWnJnc0N5NzRnbnRHZAF9tc1ROdnNQbnU0WWJHeE1DZAy1YMWgteWlPX1BJTkRNRWw0YzZAPVVhrbFV4YVo1NUtfaWRqdThqVk1sNURPcQZDZD',
      'fitbitToken' => 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMzg4WjMiLCJzdWIiOiI1QlFHQ1MiLCJpc3MiOiJGaXRiaXQiLCJ0eXAiOiJhY2Nlc3NfdG9rZW4iLCJzY29wZXMiOiJybG9jIHJociByYWN0IHJwcm8iLCJleHAiOjE2Nzc3NzQ0ODksImlhdCI6MTY0NjIzODUzOH0.RFj9JHXsupuz99nGlTd3RQo9Jwx31TzVd_FHLTtGQ3c',
      'blogFolder' => '../posts'
  ];

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }
?>