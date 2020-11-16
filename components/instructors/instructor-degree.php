<?php
/**
 * Template part for displaying instructor belt degree.
 *
 * @package Taekwondo
 */
?>

<?php 
// Variables
$degree = get_sub_field_object( 'degree' );
$value = $degree['value'];
$label = $degree['choices'][ $value ];
?>

<div class="degree">

    <?php if ( $value <= '10' ) { ?>

        <div class="circle circle-black">
            <div class="circle-inner">
                <div class="circle-wrapper">
                    <div class="circle-content">
                        <p><?php echo $label; ?></p>
                    </div>
                </div>
            </div>
        </div>

    <?php } elseif ($value >= '11' && $value <= '14' )  { ?>

        <div class="circle circle-red">
                <div class="circle-inner">
                    <div class="circle-wrapper">
                        <div class="circle-content">
                            <p><?php echo $label; ?></p>
                        </div>
                    </div>
                </div>
            </div>

    <?php } else { ?>

        <div class="circle circle-blue">
            <div class="circle-inner">
                <div class="circle-wrapper">
                    <div class="circle-content">
                        <p><?php echo $label; ?></p>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

</div>
