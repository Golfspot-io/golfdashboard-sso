<!DOCTYPE html>
<?php
include './_init.php';

if(isset($_POST['auth_token'])) {
    $_SESSION['authToken'] = $_POST['auth_token'] ?? null;
}

?>
<html>

<body>
    <pre id="response"></pre>

    <a href="index.php" title="Back to login">Back to login</a>

    <script>
        window.document.addEventListener('DOMContentLoaded', () => {
            let fail = (error) => {
                window.location = `<?php echo $yourDomain ?>/fail.php?error[]=${error}`
            }

            window.fetch("<?php echo $_SESSION['apiDomain'] ?>/profile", {
                    mode: "cors",
                    headers: {
                        "Accept": 'application/json',
                        "Authorization": "Bearer <?php echo $_SESSION['authToken'] ?>",
                        "X-GolfOrganisation": '<?php echo $_SESSION['apiAccountCode'] ?>'
                    }
                })
                .then((response) => {
                    if (response.status === 200) return response.json()

                    if (response.status === 401) fail('Login failed')

                    response.fail()
                })
                .then((response) => {
                    window.document.getElementById('response').innerText = JSON.stringify(response, null, 2)
                })
                .catch((error) => {
                    fail('Could not reach Golfdashboard')
                })
        });
    </script>
</body>

</html>