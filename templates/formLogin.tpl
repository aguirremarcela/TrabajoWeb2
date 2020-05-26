{include 'header.tpl'}
<form method="POST" action="verify" class="col-md-4 offset-md-4 mt-4">

        <div class="form-group">
            <label>Usuario (email)</label>
            <input type="email" name="username" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
        {/if}
        <input type="submit" class="btn btn-primary"/>
    </form>
{include 'footer.tpl'}