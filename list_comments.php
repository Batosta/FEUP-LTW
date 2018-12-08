<section id="comments">
  <h1>Comment</h1>
  <?php foreach ($comments as $comment) { ?>
    <article class="comment">
      <span class="postID"><?=$comment['postID']?></span>
      <span class="accountID"><?=$comment['accountID']?></span>
      <p><?=$comment['commentText']?></p>
    </article>
  <?php } ?>
  <form>
    <h2>Add your comment : </h2>
    <label>Comment
      <textarea name="text"></textarea>
    </label>
    <input type="hidden" name="id" value="<?=$article['id']?>">
    <input type="submit" value="Reply">
  </form>
</section>
