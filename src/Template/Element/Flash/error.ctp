<!-- <?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div> -->

<script type="text/javascript">
	$.alert({
	    title: 'Atenção!',
	    content: '<?= $message ?>',
	});
</script>
