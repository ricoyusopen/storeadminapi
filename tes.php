<?php
public function list()
    {
        $data['title'] = "List Penjualan";
        $data['user'] = $this->db->get_where('user',
                                [
                                  'email' =>  $this->session->userdata('email')
                                ]
                        )->row_array();

        $data['datapelanggan'] = $this->admin->getDataPenjualan();
        $data['penjualan']     = $this->admin->get('penjualan');
        $data['pelanggan']     = $this->admin->get('pelanggan');
        $data['kasir']         = $this->admin->get('kasir');
        $data['mekanik']       = $this->admin->get('mekanik');
        $data['barang']        = $this->admin->get('barang');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/list', $data);
        $this->load->view('templates/footer');
    }

public function getDataPenjualan($limit = null, $id_penjualan = null, $range = null) {
    $this->db->select('*');
    $this->db->join('kasir k', 'pj.user_id = k.id_kasir');
    $this->db->join('pelanggan plg', 'pj.pelanggan_id = plg.id_pelanggan');
    $this->db->join('mekanik m', 'pj.mekanik_id = m.id_mekanik');
    $this->db->join('barang b', 'pj.barang_id = b.id_barang');
    $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
    if ($limit != null) {
         $this->db->limit($limit);
     }

     if ($id_penjualan != null) {
         $this->db->where('id_penjualan', $id_penjualan);
     }

     if ($range != null) {
         $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
         $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
     }

     $this->db->order_by('id_penjualan', 'DESC');
     return $this->db->get('penjualan pj')->result_array();
}





      SELECT * FROM penjualan pj JOIN kasir k ON k.id_kasir = pj.user_id JOIN pelanggan plg ON plg.id_pelanggan = pj.pelanggan_id
JOIN mekanik m ON pj.mekanik_id = m.id_mekanik JOIN barang b ON pj.barang_id = b.id_barang JOIN satuan s ON s.id_satuan = b.satuan_id
