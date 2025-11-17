
@php
    $tnc_copy = '   <ul class="note">
                        <li>* Terms and Conditions apply</li>
                    </ul>';

    switch($model_slug){
        case 'hrv':
            echo '
            <ul class="note number">
                <li>Prices and specifications are subjected to change without prior notice.</li>
                <li>For Company Registration:<br>
                    Registration Fee is RM500.<br>
                    Road Tax is doubled.<br>
                </li>
                <li>For Foreigner Registration for 1.8L E, 1.8L V & 1.8L RS:<br>
                    Registration Fee is RM600.
                </li>
                <li>For Foreigner Registration for 1.5L Hybrid:<br>
                    Registration Fee is RM350.
                </li>
                <li>5 years warranty with unlimited mileage* </li>
                <li>Free labour service applicable up to 6 times within 100,000km or 5 years* for 1.8L E, 1.8L V & 1.8L RS.</li>
                <li>Free labour service applicable up to 5 times within 100,000km or 5 years* for 1.5L Hybrid.</li>
                <li>8 years warranty for lithium-ion battery with unlimited mileage* for 1.5L Hybrid.</li>
            </ul>' . $tnc_copy;
            break;

        case 'odyssey':
            echo '
            <ul class="note number">
                <li>Prices and specifications are subjected to change without prior notice.</li>
                <li>For Company Registration:<br>
                    Registration Fee is RM500.<br>
                    Road Tax is doubled.<br>
                </li>
                <li>For Foreigner Registration:<br>
                    Registration Fee is RM600.
                </li>

                <li>5 years warranty with unlimited mileage* <br>
                    Free Labour Service applicable up to 6 times within 100,000km or 5 years*</li>

            </ul>' . $tnc_copy;
            break;

        case 'civic':
            echo '
            <ul class="note number">
                <li>Prices and specifications are subjected to change without prior notice.</li>
                <li>For Company Registration:<br>
                    Registration Fee is RM500.<br>
                    Road Tax is doubled.<br>
                </li>
                <li>For Foreigner Registration:<br>
                    Registration Fee for 1.8 S is RM600.<br>
                    Registration Fee for 1.5 TC & 1.5 TC-P is RM350.<br>
                </li>

                <li>5 years warranty with unlimited mileage* </li>
                <li>Free Labour Service applicable up to 5 times within 100,000km or 5 years*</li>
            </ul>' . $tnc_copy;
            break;

        case 'crv':
            echo '
            <ul class="note number">
                <li>Prices and specifications are subjected to change without prior notice.</li>
                <li>For Company Registration:<br>
                    Registration Fee is RM500.<br>
                    Road Tax is doubled.<br>
                </li>
                <li>For Foreigner Registration:<br>
                    Registration Fee for 2.0 2WD is RM600.<br>
                    Registration Fee for 1.5 TC 2WD, 1.5 TC 4WD & 1.5 TC-P 2WD is RM350.
                </li>

                <li>5 years warranty with unlimited mileage* <br>
                    Free Labour Service applicable up to 5 times within 100,000km or 5 years*
                </li>

            </ul>
            <ul class="note">
                <li>* Terms and Conditions apply</li>
                <li>EEV Certification only applicable for 1.5 TC 2WD, 1.5 TC 4WD & 1.5 TC-P 2WD.</li>
            </ul>
            ';
            break;

        case 'brv':
            echo '
            <ul class="note number">
                <li>Prices and specifications are subjected to change without prior notice.</li>
                <li>For Company Registration:<br>
                    Registration Fee is RM500.<br>
                    Road Tax is doubled.<br>
                </li>
                <li>For Foreigner Registration:<br>
                    Registration Fee is RM350.
                </li>
                <li>5 years warranty with unlimited mileage* <br>
                    Free labour service applicable up to 5 times within 100,000km or 5 years*</li>
            </ul>' . $tnc_copy;
            break;

        case 'accord':
            echo '
            <ul class="note number">
                <li>Prices and specifications are subjected to change without prior notice.</li>
                <li>For Company Registration:<br>
                    Registration Fee is RM500.<br>
                    Road Tax is doubled.<br>
                </li>
                <li>For Foreigner Registration:<br>
                    Registration Fee is RM350.
                </li>
                <li>5 years warranty with unlimited mileage* Free labour service applicable up to 5 times within 100,000km or 5 years* 8 years warranty for lithium-ion battery with unlimited mileage*</li>
            </ul>' . $tnc_copy;
            break;

        default:
            echo '
            <ul class="note number">
                <li>Prices and specifications are subjected to change without prior notice.</li>
                <li>For Company Registration:<br>
                    Registration Fee is RM500.<br>
                    Road Tax is doubled.<br>
                </li>
                <li>For Foreigner Registration:<br>
                    Registration Fee is RM350.
                </li>
                <li>5 years warranty with unlimited mileage* Free labour service applicable up to 6 times within 100,000km or 5 years* 8 years warranty for lithium-ion battery with unlimited mileage*</li>
            </ul>' . $tnc_copy;

    }
@endphp
