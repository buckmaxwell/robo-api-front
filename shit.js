$.ajax('http://crimenut.maxwellbuck.com/users/login', {
    method: 'PUT',
    contentType: 'application/json',
    processData: false,
    data: JSON.stringify({
        username: 'admin',
        password: 'admin'
    })
})
.then(
    function success(userInfo) {
        alert(userInfo);
        // userInfo will be a JavaScript object containing properties such as
    }
);