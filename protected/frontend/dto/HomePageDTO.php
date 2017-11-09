<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace frontend\dto;
/**
 * Data transfer object for home page
 *
 * @package frontend\dto
 */
class HomePageDTO extends \usni\library\dto\BaseDTO
{
    private $_latestProducts;
    
    public function getLatestProducts()
    {
        return $this->_latestProducts;
    }

    public function setLatestProducts($latestProducts)
    {
        $this->_latestProducts = $latestProducts;
    }

	private $_hitProducts;

	public function getHitProducts()
	{
		return $this->_hitProducts;
	}

	public function setHitProducts($hitProducts)
	{
		$this->_hitProducts = $hitProducts;
	}


	private $_actionProducts;

	public function getActionProducts()
	{
		return $this->_actionProducts;
	}

	public function setActionProducts($actionProducts)
	{
		$this->_actionProducts = $actionProducts;
	}


}
