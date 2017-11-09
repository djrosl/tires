<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 01.10.2017
 * Time: 15:45
 */

?>


<div class="filterBlock <?=$type === '_catalogfilter' ? 'filterBlock__aside' : ''?>">
	<div class="filterBlock-nav clearfix">
		<a href="#" class="navBtnGlobal <?=$cat_id == 4 ? 'navBtnGlobal__checked' : ''?>" data-btnval="tires">шины</a>
		<a href="#" class="navBtnGlobal <?=$cat_id == 5 ? 'navBtnGlobal__checked' : ''?>" data-btnval="disks">диски</a>
	</div>
	<form class="filterBlock-content <?=$cat_id == 4 ? 'filterBlock-content__active' : ''?>" data-procuct="tires" action="<?=\usni\UsniAdaptor::createUrl('/catalog/productCategories/site/view', ['id' => 4]);?>">
		<input type="hidden" name="id" value="4">
		<div class="filterBlock-prodWrap filterBlock-prodWrap__active" data-filterBy="default">
			<?php foreach($attributes as $attribute){ if(!$attribute['values']) continue; ?>
			<a href="#" class="filterBlock-dropBtn"><?=$attribute['name']?></a>
			<div class="filterBlock-dropDown">
				<div class="searchForm">
					<input type="text" class="searchForm-area searchForm-area__filter" placeholder="поиск">
					<button class="searchForm-button"></button>
				</div>
				<div class="mCustomScrollbar">
					<ul class="filterBlock-selectWrap">
						<?php foreach($attribute['values'] as $value){ ?>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" <?=!empty($values[$attribute['id']]) && $values[$attribute['id']] === $value && $cat_id == 4 ? 'checked="checked"' : ''?> name="a_<?=$attribute['id']?>" value="<?=$value?>" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal"><?=$value?></span>
							</label>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php } ?>


			<button class="filterBlock-submitBtn buttonGlobal">подобрать</button>
			<div class="filterBlock-searchByCarWrap">
<!--				<a href="#" class="filterBlock-searchByCar">Подбор по авто</a>-->
			</div>
		</div>

		<div class="filterBlock-prodWrap" data-filterBy="car">
			<a href="#" class="filterBlock-backBtn">назад</a>
			<a href="#" class="filterBlock-dropBtn">Производитель</a>
			<div class="filterBlock-dropDown">
				<div class="searchForm">
					<input type="text" class="searchForm-area searchForm-area__filter" placeholder="поиск">
					<button class="searchForm-button"></button>
				</div>
				<div class="mCustomScrollbar">
					<ul class="filterBlock-selectWrap filterBlock-selectWrap__bigger">
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="AC" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">AC</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Acura" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Acura</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Alfa Romeo" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Alfa Romeo</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Alpina" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Alpina</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Alpine" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Alpine</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Aro" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Aro</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Asia" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Asia</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Aston Martin" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Aston Martin</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Audi" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Audi</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Austin" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Austin</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="BAW" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">BAW</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Beijing" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Beijing</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Bentley" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Bentley</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="BMW" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">BMW</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Brilliance" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Brilliance</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Bristol" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Bristol</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Bugatti" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Bugatti</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Buick" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Buick</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="BYD" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">BYD</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Богдан" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Богдан</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Vector" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Vector</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Venturi" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Venturi</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Volkswagen" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Volkswagen</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Volvo" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Volvo</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Vortex" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Vortex</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Wartburg" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Wartburg</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Westfield" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Westfield</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Wiesmann" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Wiesmann</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="Wuling" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">Wuling</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="manufacturer" value="ВАЗ (Lada)" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">ВАЗ (Lada)</span>
							</label>
						</li>
					</ul>
				</div>
			</div>
			<a href="#" class="filterBlock-dropBtn">Модель</a>
			<div class="filterBlock-dropDown">
				<div class="searchForm">
					<input type="text" class="searchForm-area searchForm-area__filter" placeholder="поиск">
					<button class="searchForm-button"></button>
				</div>
				<div class="mCustomScrollbar">
					<ul class="filterBlock-selectWrap filterBlock-selectWrap__bigger">
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.00</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.00</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.25</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.25</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.50</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.50</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.00</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.00</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.25</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.25</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.50</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.50</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.00</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.00</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.25</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.25</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.50</span>
							</label>
						</li>
						<li class="filterBlock-selectLi">
							<label class="filterBlock-selectItem">
								<input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
								<span class="filterBlock-selectVal">2.50</span>
							</label>
						</li>
					</ul>
				</div>
			</div>

			<button class="filterBlock-submitBtn buttonGlobal">подобрать</button>
		</div>
	</form>

    <form class="filterBlock-content <?=$cat_id == 5 ? 'filterBlock-content__active' : ''?>" data-procuct="disks" action="<?=\usni\UsniAdaptor::createUrl('/catalog/productCategories/site/view', ['id' => 4]);?>">
        <input type="hidden" name="id" value="5">
        <div class="filterBlock-prodWrap filterBlock-prodWrap__active" data-filterBy="default">
					<?php foreach($disk_attributes as $attribute){ if(!$attribute['values']) continue; ?>
              <a href="#" class="filterBlock-dropBtn"><?=$attribute['name']?></a>
              <div class="filterBlock-dropDown">
                  <div class="searchForm">
                      <input type="text" class="searchForm-area searchForm-area__filter" placeholder="поиск">
                      <button class="searchForm-button"></button>
                  </div>
                  <div class="mCustomScrollbar">
                      <ul class="filterBlock-selectWrap">
												<?php foreach($attribute['values'] as $value){ ?>
                            <li class="filterBlock-selectLi">
                                <label class="filterBlock-selectItem">
                                    <input type="radio" <?=!empty($values[$attribute['id']]) && $values[$attribute['id']] === $value && $cat_id == 5 ? 'checked="checked"' : ''?> name="a_<?=$attribute['id']?>" value="<?=$value?>" class="filterBlock-selectCheck">
                                    <span class="filterBlock-selectVal"><?=$value?></span>
                                </label>
                            </li>
												<?php } ?>
                      </ul>
                  </div>
              </div>
					<?php } ?>


            <button class="filterBlock-submitBtn buttonGlobal">подобрать</button>
            <div class="filterBlock-searchByCarWrap">
                <!--				<a href="#" class="filterBlock-searchByCar">Подбор по авто</a>-->
            </div>
        </div>

        <div class="filterBlock-prodWrap" data-filterBy="car">
            <a href="#" class="filterBlock-backBtn">назад</a>
            <a href="#" class="filterBlock-dropBtn">Производитель</a>
            <div class="filterBlock-dropDown">
                <div class="searchForm">
                    <input type="text" class="searchForm-area searchForm-area__filter" placeholder="поиск">
                    <button class="searchForm-button"></button>
                </div>
                <div class="mCustomScrollbar">
                    <ul class="filterBlock-selectWrap filterBlock-selectWrap__bigger">
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="AC" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">AC</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Acura" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Acura</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Alfa Romeo" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Alfa Romeo</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Alpina" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Alpina</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Alpine" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Alpine</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Aro" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Aro</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Asia" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Asia</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Aston Martin" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Aston Martin</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Audi" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Audi</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Austin" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Austin</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="BAW" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">BAW</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Beijing" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Beijing</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Bentley" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Bentley</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="BMW" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">BMW</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Brilliance" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Brilliance</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Bristol" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Bristol</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Bugatti" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Bugatti</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Buick" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Buick</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="BYD" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">BYD</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Богдан" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Богдан</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Vector" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Vector</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Venturi" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Venturi</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Volkswagen" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Volkswagen</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Volvo" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Volvo</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Vortex" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Vortex</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Wartburg" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Wartburg</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Westfield" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Westfield</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Wiesmann" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Wiesmann</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="Wuling" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">Wuling</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="manufacturer" value="ВАЗ (Lada)" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">ВАЗ (Lada)</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="#" class="filterBlock-dropBtn">Модель</a>
            <div class="filterBlock-dropDown">
                <div class="searchForm">
                    <input type="text" class="searchForm-area searchForm-area__filter" placeholder="поиск">
                    <button class="searchForm-button"></button>
                </div>
                <div class="mCustomScrollbar">
                    <ul class="filterBlock-selectWrap filterBlock-selectWrap__bigger">
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.00</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.00</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.25</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.25</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.50</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.50</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.00</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.00</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.25</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.25</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.50</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.50</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.00</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.00" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.00</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.25</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.25" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.25</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.50</span>
                            </label>
                        </li>
                        <li class="filterBlock-selectLi">
                            <label class="filterBlock-selectItem">
                                <input type="radio" name="model" value="2.50" class="filterBlock-selectCheck">
                                <span class="filterBlock-selectVal">2.50</span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>

            <button class="filterBlock-submitBtn buttonGlobal">подобрать</button>
        </div>
    </form>
</div>
