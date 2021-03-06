<?php
$weekdays_short = [
	__( 'Mon', 'my-listing' ), __( 'Tue', 'my-listing' ), __( 'Wed', 'my-listing' ),
	__( 'Thu', 'my-listing' ), __( 'Fri', 'my-listing' ), __( 'Sat', 'my-listing' ), __( 'Sun', 'my-listing' )
];

$schedule = new CASE27\Classes\WorkHours( ! empty( $field['value'] ) ? (array) $field['value'] : [] );
?>

<div class="form-group double-input c27-work-hours">
	<ul class="days bl-tabs">
		<div class="bl-tabs-menu">
			<ul class="nav nav-tabs" role="tablist">

				<?php $i = 0; foreach ( $schedule->get_schedule() as $weekday ): ?>

					<li role="presentation" <?php echo $weekday['day'] == 'Monday' ? 'class="active"' : '' ?>>
						<a href="#day_<?php echo esc_attr( $weekday['day'] ) ?>"
						   aria-controls="day_<?php echo esc_attr( $weekday['day'] ) ?>"
						   role="tab" class="tab-switch">
						   <span class="visible-lg"><?php echo esc_html( $weekday['day_l10n'] ) ?></span>
						   <span class="hidden-lg"><?php echo esc_html( $weekdays_short[ $i ] ) ?></span>
						</a>
					</li>

				<?php $i++; endforeach ?>

			</ul>
		</div>
		<div class="tab-content">

			<?php foreach ( $schedule->get_schedule() as $weekday ): ?>

				<div role="tabpanel" class="day-wrapper tab-pane fade <?php echo $weekday['day'] == 'Monday' ? 'active in' : '' ?>" id="day_<?php echo esc_attr( $weekday['day'] ) ?>">
					<div class="repeater work-hours-repeater" data-list="<?php echo htmlspecialchars( json_encode( $schedule->get_day_ranges( $weekday['day'] ) ), ENT_QUOTES, 'UTF-8' ) ?>">
						<div data-repeater-list="<?php echo esc_attr( (isset($field['name']) ? $field['name'] : $key) . "[{$weekday['day']}]" ) ?>">
							<?php // dump($weekday) ?>
							<li class="day" data-repeater-item>
								<select name="from" placeholder="<?php esc_attr_e( 'From', 'my-listing' ) ?>">
									<option value=""><?php esc_html_e( 'From', 'my-listing' ) ?></option>
									<?php foreach (range(0, 86399, 900) as $time): ?>
										<option value="<?php echo esc_attr( gmdate( 'H:i', $time) ) ?>"><?php echo esc_html( gmdate( get_option( 'time_format' ), $time ) ) ?></option>
									<?php endforeach ?>
								</select>

								<select name="to" placeholder="<?php esc_attr_e( 'To', 'my-listing' ) ?>">
									<option value=""><?php esc_html_e( 'To', 'my-listing' ) ?></option>
									<?php foreach (range(0, 86399, 900) as $time): ?>
										<option value="<?php echo esc_attr( gmdate( 'H:i', $time) ) ?>"><?php echo esc_html( gmdate( get_option( 'time_format' ), $time ) ) ?></option>
									<?php endforeach ?>
								</select>

								<button data-repeater-delete type="button" class="buttons button-2 icon-only small"><i class="material-icons delete"></i></button>
							</li>
						</div>

						<input data-repeater-create type="button" value="<?php esc_attr_e( 'Add Hours', 'my-listing' ) ?>">
					</div>
				</div>

			<?php endforeach ?>

		</div>
	</ul>
</div>

<div class="form-group">
	<?php
	$timezones = timezone_identifiers_list();
	$default_timezone = date_default_timezone_get();
	$wp_timezone = get_option('timezone_string');
	$listing_timezone = isset($field['value']) && isset($field['value']['timezone']) && in_array( $field['value']['timezone'], $timezones ) ? $field['value']['timezone'] : false;

	$current_timezone = ( $listing_timezone ?: ( $wp_timezone ?: $default_timezone ) );
	?>
	<label><?php _e( 'Timezone', 'my-listing' ) ?></label>
	<select name="<?php echo esc_attr( (isset($field['name']) ? $field['name'] : $key) . "[timezone]" ); ?>" placeholder="<?php esc_attr_e( 'Timezone', 'my-listing' ) ?>" class="custom-select">
		<?php foreach ($timezones as $timezone): ?>
			<option value="<?php echo esc_attr( $timezone ) ?>" <?php echo $timezone == $current_timezone ? 'selected="selected"' : '' ?>><?php echo esc_html( $timezone ) ?></option>
		<?php endforeach ?>
	</select>
</div>

<?php if ( ! empty( $field['description'] ) ) : ?><small class="description"><?php echo $field['description']; ?></small><?php endif; ?>
