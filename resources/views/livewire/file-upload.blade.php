<div>
    <h3>Upload file:</h3>
    <form id="uploads" enctype="nultipart/form-data" wire:submit.prevent="FileUpload">
        <input type="text" name="name"><br>
        File upload: <br>
        <input type="file" name="file"><br>
        <button type="submit">Save</button>
    </form>
</div>
