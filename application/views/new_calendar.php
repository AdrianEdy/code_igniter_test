<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/clndr.css" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="calnder" style="width:700px; margin:auto;">
	<div class="column_right_grid calender">
		<div class="cal1">
      <?php 
          $count = 1;
          foreach ($calendar as $month => $monthDates) { 
      ?>
			<div class="clndr <?= $count != 1 ? 'd-none' : '' ?>" data-month="<?= (int) $month ?>">
				<div class="clndr-controls">
          <?php if ($count != 1) { ?>
          <div class="clndr-control-button">
              <p class="clndr-previous-button">previous</p>
          </div>
          <?php } ?>
          <div class="month"><?= date("F", mktime(0, 0, 0, $month, 10)) ?> 2020</div>
          <?php if ($count != count($calendar)) { ?>
          <div class="clndr-control-button rightalign">
              <p class="clndr-next-button">next</p>
          </div>
          <?php } ?>
				</div>
				<table class="clndr-table">
					<thead>
						<tr class="header-days">
							<td class="header-day">MON</td>
							<td class="header-day">TUE</td>
							<td class="header-day">WED</td>
							<td class="header-day">THU</td>
							<td class="header-day">FRI</td>
							<td class="header-day">SAT</td>
							<td class="header-day">SUN</td>
						</tr>
					</thead>
					<tbody>
          <?php foreach ($monthDates as $dates) { ?>
          <tr>
            <?php foreach ($dates as $date) { ?>
            <td class="day 
                <?= $date['filler'] ? 'adjacent-month' : '' ?> 
                <?= $date['booked'] ? 'booked' : '' ?> 
                <?= $date['today'] ? 'today' : '' ?>"
                data-date="<?= $date['date'] ?>">
                <div class="day-contents"><?= $date['day'] ?></div>
            </td>
            <?php } ?>
          </tr>
          <?php } ?>
					</tbody>
				</table>
      </div>
      <?php 
          $count++;
        } 
      ?>
		</div>
	</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="roomModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Room Booked in this day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Room Name</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
      $('.booked').click(function () {
        let date = $(this).data('date');
        let thisDate = $(this)

        $.ajax({
          dataType: "json",
          url: "room/booked-at/" + date,
          method: 'get',
          headers: {
            'Accept': 'application/json',
          },
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function () {
            thisDate.find('.day-contents').hide()
            thisDate.append(`<div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                  <span class="sr-only">Loading...</span>
              </div>
            </div>`)
          },
          complete: function (data) {
            thisDate.find('.d-flex').remove()
            thisDate.find('.day-contents').show()
          },
          success: function (data) {
            $('#roomModal').find('tbody').html('')
            $.each(data.results, function (i) {
              $('#roomModal').find('tbody').append(`
                <tr>
                  <th scope="row">${i + 1}</th>
                  <td>${this.name}</td>
                </tr>`)
            })
            $('#roomModal').show()
          },
          error: function (err) {
            console.log(err)
          }
        })
      })

      $('.close').click(function () {
        $(this).parents('.modal').hide()
      })

      $('.clndr-previous-button').click(function () {
        var thisCalendar = $(this).parents('.clndr')
        thisCalendar.addClass('d-none')
        var prev = `.clndr[data-month="${thisCalendar.data('month') - 1}"]`
        $(prev).removeClass('d-none')
      })

      $('.clndr-next-button').click(function () {
        var thisCalendar = $(this).parents('.clndr')
        thisCalendar.addClass('d-none')
        var next = `.clndr[data-month="${thisCalendar.data('month') + 1}"]`
        $(next).removeClass('d-none')
      })
    })
</script>