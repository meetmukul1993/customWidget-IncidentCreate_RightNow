<div id="rn_<?= $this->instanceID ?>" class="<?= $this->classList ?>">

<input type="text" name="subject" placeholder="Incident Subject" id="rn_<?=$this->instanceID;?>_subject">
<input type="text" name="contact_email" placeholder="Email Id" id="rn_<?=$this->instanceID;?>_email">

<button id="rn_<?=$this->instanceID;?>_submitButton">
	<?=$this->data['attrs']['button_label'];?>
</button>
</div>