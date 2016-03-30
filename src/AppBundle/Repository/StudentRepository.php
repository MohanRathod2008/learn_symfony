<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * StudentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StudentRepository extends EntityRepository
{
	
	public function getAllStudents(){
		
		// ORM
		/* $em  = $this->getEntityManager();
		 $qb = $em->createQueryBuilder();
		 $qb->select('s.schoolname,s.username')
		 ->from('AppBundle:School','s')
		 ->orderBy('s.username');
		 	
		 $query = $qb->getQuery();
		
		 return $query->getArrayResult(); */
		
		
		// DBAL
		$em  = $this->getEntityManager();
		$conn = $em->getConnection();
		$qb = $conn->createQueryBuilder();
		$qb->select('s.name,s.parentid,s.schoolid,s.academic_year,s.gender,s.address')
		->from('student','s')
		->orderBy('s.parentid');
		
		$stmt = $qb->execute();
		
		return $stmt->fetchAll();
		
	}
	
	/* public function insertStudent()
	{
		// ORM
		/* $em  = $this->getEntityManager();
		$qb = $em->createQueryBuilder();
		$qb->select('s.schoolname,s.username')
		->from('AppBundle:School','s')
		->orderBy('s.username');
			
		$query = $qb->getQuery();
	
		return $query->getArrayResult(); 
		///////////////////////////////////////////////////
	
		// DBAL
		$em  = $this->getEntityManager();
		$conn = $em->getConnection();
		$qb = $conn->createQueryBuilder();
		$qb->select('s.schoolname,s.username,s.contact_pname')
		->from('school','s')
		->orderBy('s.username');
	
		$stmt = $qb->execute();
	
		return $stmt->fetchAll();
	} */
	
	public function editStudent($id)
	{
		$id = "1680";
		$em = $this->getDoctrine()->getManager();
		$student = $em->getRepository('AppBundle:Product')->find($id);
		if (!$student) {
			throw $this->createNotFoundException('No student found for id '.$id);
		}
		$student->setName('New student name');
		$em->flush();
		
	}
}
