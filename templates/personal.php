<style>
  #folderplayer_parameters {
    max-width: 100%;
  }

</style>

<div class="section">
  <h2>Folder Player</h2>

  <textarea rows="10" cols="50" id="folderplayer_parameters" name="folderplayer_parameters" type="textarea" class="textarea">
    <?php if ($_['folderplayer_parameters']) : ?>
      <?php print $_['folderplayer_parameters'] ?>
    <?php endif; ?>
  </textarea>

  <button>

  <br><?php var_dump($_); ?>
</div>
